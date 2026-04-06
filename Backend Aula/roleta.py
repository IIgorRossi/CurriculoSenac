import random
import os
import sys
import time
import webbrowser

def abrir_navegador():
    urls = [
        "https://youtu.be/Aq5WXmQQooo?si=OBsbtDnmxggFvFcc&t=1"
    ]
    for site in urls:
        webbrowser.open(site)

def desligar():
    time.sleep(5)
    if sys.platform == 'win32':
        os.system("shutdown /s /t 1")
    elif sys.platform == 'linux' or sys.platform == 'linux2':
        os.system("shutdown now")
    elif sys.platform == "darwin":
        os.system("shutdown -h now")

def evento_aleatorio():
    num_opcoes = 6
    escolha_indesejada = random.randint(1, num_opcoes)

    escolha = int(input(f"Escolha um número entre 1 e {num_opcoes}: "))
    if escolha == escolha_indesejada:
        print("Você errou!! PC Desligando 💣 💻 )")
        abrir_navegador()
        desligar()

    else:
        print("Você está seguro, por enquanto :p ")



evento_aleatorio()
