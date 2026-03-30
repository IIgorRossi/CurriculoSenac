print("Hello Word")

nome = input("Insira seu nome: ")
alcool = float(input("Digite Valor do Alcool:"))
gasolina = float(input("Digite Valor da Gasolina:"))

resposta = alcool / gasolina

if(resposta >= 0.7): 
 print("Abasteça com Gasolina "+nome)
else:
    print("Abasteça com Alcool "+nome)
