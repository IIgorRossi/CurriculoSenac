import random

opcao = -1
nomes = []

def inserir():
    qtdNomes = int(input("Quantas pessoas vai inserir? "))

    for i in range(qtdNomes):
        nome = input("Insira o nome: ")
        nomes.append(nome)
        
def listar():
    # loop
    print("=== Lista de Nomes ===")
    for contador in nomes:
        print("=== "+ contador + " ===")


def sortear():
    qtdSortudos = int(input("Quantos Ganhadores? "))
    sortudos = []  
    while qtdSortudos != len(sortudos):
        sorteado = random.choice(nomes)
        if(sorteado in sortudos):
            sorteado = random.choice(nomes)
        else:
            sortudos.append(sorteado)
            print("Ganhador", sorteado)
  
while opcao != 4:
    print('''
    Digite uma das seguintes opções:
    1 - para inserir nome
    2 - para ver nomes
    3 - para sortear
    4 - para sair
    ''')
    opcao = int(input("insira a opção: "))

    if opcao == 1:
     inserir()
    elif opcao == 2:
     listar()
    elif opcao == 3:
     sortear()
    elif opcao == 4:
       exit()
    else:
        print("Essa não é uma opção válida")
