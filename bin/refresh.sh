#!/bin/bash
# https://unix.stackexchange.com/questions/37258/refresh-reload-active-browser-tab-from-command-line
set -o errexit
set -o nounset

keystroke="CTRL+F5"

# Check if at least one file is provided
if [ "$#" -lt 1 ]; then
  echo "Usage: $0 <file1> [<file2> ... <fileN>]"
  exit 1
fi

# Watch the given files for changes using inotifywait
inotifywait -m -e close_write "$@" |
while read -r directory events filename; do
    # Send keystroke to refresh the browser
    BROWSER="firefox"  # Modify if needed

    # Find all visible browser windows
    browser_windows=$(xdotool search --sync --all --onlyvisible --name "$BROWSER")

    # Send keystroke to each browser window
    for bw in $browser_windows; do
        # sleep 0.2 # wait a bit
        xdotool key --window "$bw" "$keystroke"
    done
done
