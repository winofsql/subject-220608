REM �쐬��A�e�V���[�g�J�b�g�̃v���p�e�B�̏ڍאݒ���A�Ǘ��Ҍ����Ŏ��s�\�ɂ��Ă�������

set WshShell = WScript.CreateObject("WScript.Shell")
strCurPath = WshShell.CurrentDirectory

set oShellLink = WshShell.CreateShortcut(strCurPath & "\�l���j���[.lnk")
oShellLink.TargetPath = "mshta.exe"
oShellLink.Arguments = strCurPath & "\shell_mtn_user-app.hta"
oShellLink.WindowStyle = 1
oShellLink.IconLocation = "%SystemRoot%\system32\imageres.dll,76"
oShellLink.WorkingDirectory = strCurPath
oShellLink.Save

set oShellLink = WshShell.CreateShortcut(strCurPath & "\���[�U�[���j���[.lnk")
oShellLink.TargetPath = "mshta.exe"
oShellLink.Arguments = strCurPath & "\shell_mtn_user.hta"
oShellLink.WindowStyle = 1
oShellLink.IconLocation = "%SystemRoot%\system32\imageres.dll,1"
oShellLink.WorkingDirectory = strCurPath
oShellLink.Save

set oShellLink = WshShell.CreateShortcut(strCurPath & "\�l���j���[(�T�u).lnk")
oShellLink.TargetPath = "mshta.exe"
oShellLink.Arguments = strCurPath & "\shell_mtn_user-app-win.hta"
oShellLink.WindowStyle = 1
oShellLink.WorkingDirectory = strCurPath
oShellLink.Save

set oShellLink = WshShell.CreateShortcut(strCurPath & "\���[�U�[���j���[(�T�u).lnk")
oShellLink.TargetPath = "mshta.exe"
oShellLink.Arguments = strCurPath & "\shell_mtn_user-win.hta"
oShellLink.WindowStyle = 1
oShellLink.WorkingDirectory = strCurPath
oShellLink.Save
