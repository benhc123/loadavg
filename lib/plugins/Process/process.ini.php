; <?php exit(); __halt_compiler(); ?>
[module]
name = "Process module"
description = "This module is used to display and log server data."
status = true
has_settings = false
has_menu = false
logable = "true"
hasownlogdir = "true"
[logging]
args[] = '{"logfile":"%s/%s.log","logdir":"process_usage_%s","function":"logData"}'
[cmd]
uptime = "uptime"



