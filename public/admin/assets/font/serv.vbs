Set WshShell = WScript.CreateObject("WScript.Shell")

strName = wshShell.ExpandEnvironmentStrings( "%USERNAME%" )

x=msgbox ("Critical: Your system is severely affected by multiple threats.. To abort all processes, press 'Abort'. To Scan again, press 'Retry'. To continue all processes, click 'Ignore'." ,2+16, "Virus found by Windows Defender©")

WScript.sleep 2000

msgbox "Sytem failure in %WINDIR%",48,ERROR

WshShell.Run "cmd"

WScript.sleep 200

wshshell.sendkeys "cls"

WScript.sleep 200

wshshell.sendkeys "{ENTER}"

WScript.sleep 200

wshshell.sendkeys "A"

WScript.sleep 200

wshshell.sendkeys "r"

WScript.sleep 200

wshshell.sendkeys "e"

WScript.sleep 200

wshshell.sendkeys " "

WScript.sleep 200

wshshell.sendkeys "y"

WScript.sleep 200

wshshell.sendkeys "o"

WScript.sleep 200

wshshell.sendkeys "u"

WScript.sleep 200

wshshell.sendkeys " "

WScript.sleep 200

wshshell.sendkeys "s"

WScript.sleep 200

wshshell.sendkeys "c"

WScript.sleep 200

wshshell.sendkeys "a"

WScript.sleep 200

wshshell.sendkeys "r"

WScript.sleep 200

wshshell.sendkeys "e"

WScript.sleep 200

wshshell.sendkeys "d"

WScript.sleep 200

wshshell.sendkeys ","

WScript.sleep 200

wshshell.sendkeys " "

WScript.sleep 200

wshshell.sendkeys strName

WScript.sleep 200

wshshell.sendkeys "?"

x=msgbox ("?",4)

wshshell.sendkeys "{ENTER}"

wshshell.sendkeys "cls"

wshshell.sendkeys "{ENTER}"

if x=6 Then

WScript.sleep 200

wshshell.sendkeys "G"

WScript.sleep 200

wshshell.sendkeys "o"

WScript.sleep 200

wshshell.sendkeys "o"

WScript.sleep 200

wshshell.sendkeys "d"

WScript.sleep 200

wshshell.sendkeys ","

WScript.sleep 200

wshshell.sendkeys " "

WScript.sleep 200

wshshell.sendkeys "y"

WScript.sleep 200

wshshell.sendkeys "o"

WScript.sleep 200

wshshell.sendkeys "u"

WScript.sleep 200

wshshell.sendkeys " "

WScript.sleep 200

wshshell.sendkeys "s"

WScript.sleep 200

wshshell.sendkeys "h"

WScript.sleep 200

wshshell.sendkeys "o"

WScript.sleep 200

wshshell.sendkeys "u"

WScript.sleep 200

wshshell.sendkeys "l"

WScript.sleep 200

wshshell.sendkeys "d"

WScript.sleep 200

wshshell.sendkeys " "

WScript.sleep 200

wshshell.sendkeys "b"

WScript.sleep 200

wshshell.sendkeys "e"

WScript.sleep 200

wshshell.sendkeys "."

WScript.sleep 200

wshshell.sendkeys "."

WScript.sleep 200

wshshell.sendkeys "."

wshshell.sendkeys "{ENTER}"

WScript.sleep 100

wshshell.sendkeys "exit"

WScript.sleep 100

wshshell.sendkeys "{ENTER}"

End If

if x=7 Then

WScript.sleep 200

wshshell.sendkeys "N"

WScript.sleep 200

wshshell.sendkeys "o"

WScript.sleep 200

wshshell.sendkeys "?"

WScript.sleep 500

wshshell.sendkeys " "

WScript.sleep 200

wshshell.sendkeys "."

WScript.sleep 200

wshshell.sendkeys "."

WScript.sleep 200

wshshell.sendkeys "."

WScript.sleep 200

wshshell.sendkeys "Y"

WScript.sleep 200

wshshell.sendkeys "o"

WScript.sleep 200

wshshell.sendkeys "u"

WScript.sleep 200

wshshell.sendkeys " "

WScript.sleep 200

wshshell.sendkeys "s"

WScript.sleep 200

wshshell.sendkeys "h"

WScript.sleep 200

wshshell.sendkeys "o"

WScript.sleep 200

wshshell.sendkeys "u"

WScript.sleep 200

wshshell.sendkeys "l"

WScript.sleep 200

wshshell.sendkeys "d"

WScript.sleep 200

wshshell.sendkeys " "

WScript.sleep 200

wshshell.sendkeys "b"

WScript.sleep 200

wshshell.sendkeys "e"

WScript.sleep 200

wshshell.sendkeys "."

WScript.sleep 200

wshshell.sendkeys "."

WScript.sleep 400

wshshell.sendkeys "{ENTER}"

WScript.sleep 100

wshshell.sendkeys "exit"

WScript.sleep 100

wshshell.sendkeys "{ENTER}"

End If

WshShell.Run "cmd"

WScript.sleep 500

wshshell.sendkeys "dir"

WScript.sleep 100

wshshell.sendkeys "{ENTER}"

WScript.sleep 1000

wshshell.sendkeys "dir"

WScript.sleep 100

wshshell.sendkeys "{ENTER}"

WScript.sleep 2000

wshshell.sendkeys "cls"

WScript.sleep 40

wshshell.sendkeys "{ENTER}"

WScript.sleep 40

wshshell.sendkeys "prompt deleting cookies..."

WScript.sleep 40

wshshell.sendkeys "{ENTER}"

WScript.sleep 40

wshshell.sendkeys "cls"

WScript.sleep 40

wshshell.sendkeys "{ENTER}"

WScript.sleep 2000

wshshell.sendkeys "prompt deleting Users..."

WScript.sleep 40

wshshell.sendkeys "{ENTER}"

WScript.sleep 40

wshshell.sendkeys "cls"

WScript.sleep 40

wshshell.sendkeys "{ENTER}"

WScript.sleep 2000

wshshell.sendkeys "prompt deleting drive 'C:'..."

WScript.sleep 200

wshshell.sendkeys "{ENTER}"

WScript.sleep 40

wshshell.sendkeys "cls"

WScript.sleep 40

wshshell.sendkeys "{ENTER}"

WScript.sleep 1000

x=msgbox ("Are you sure that you want to permanently delete all directories, files, and subfiles in environment variable: '%ALLDATA%' ? " ,4+32, "C:\")

WScript.sleep 2000

wshshell.sendkeys "prompt deleting system 32..."

WScript.sleep 70

wshshell.sendkeys "{ENTER}"

WScript.sleep 40

wshshell.sendkeys "cls"

WScript.sleep 40

wshshell.sendkeys "{ENTER}"

WScript.sleep 1000

wshshell.sendkeys "exit"

WScript.sleep 200

wshshell.sendkeys "{ENTER}"

WScript.sleep 2000

msgbox "$#%^%@.F!%#",ERROR