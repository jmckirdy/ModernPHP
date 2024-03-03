#Use pyautogui to upload pics from folder, copy text from clipboard
#First manually prepare pics folder, manually copy text from doc to clipboard
#Run program to INSERT data into phpMyAdmin
#FYI- top-left of screen is fail-safe for pyautogui

import pyperclip
import pyautogui
#import time

#gets string, splits into list of strings on line breaks
bigString = pyperclip.paste()
bigList = bigString.split('\r\n')

num = -1

def outsideLoop():
    global num
    num += 1
    return num

for x in range(3):    
    #click insert, Position(x=586, y=150)
    pyautogui.moveTo(655, 163, duration=1)
    pyautogui.click()

    #click title box, Position(x=670, y=258)
    pyautogui.moveTo(700, 300, duration=1)
    pyautogui.click()
    pyperclip.copy(str(bigList[outsideLoop()]))
    #copy title line 1
    pyautogui.hotkey('ctrl', 'v')

    #click genre_id box Position(x=635, y=673)
    pyautogui.click(675, 700)
    pyperclip.copy(str(bigList[outsideLoop()]))
    #copy genre_id
    pyautogui.hotkey('ctrl', 'v')

    #click year box Position(x=664, y=331)
    pyautogui.click(675, 655)
    pyperclip.copy(str(bigList[outsideLoop()]))
    #copy year
    pyautogui.hotkey('ctrl', 'v')

    #click starring box Position(x=635, y=712)
    pyautogui.click(675, 470)
    pyperclip.copy(str(bigList[outsideLoop()]))
    #copy starring
    pyautogui.hotkey('ctrl', 'v')

    #click director box Position(x=635, y=712)
    pyautogui.click(675, 612)
    pyperclip.copy(str(bigList[outsideLoop()]))
    #copy director
    pyautogui.hotkey('ctrl', 'v')

    #click 'Go' Position(x=1864, y=735)
    pyautogui.moveTo(1864, 735, duration=1)
    pyautogui.click()

    print(bigList)