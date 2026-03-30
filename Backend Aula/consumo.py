print("=== Calculo de Abastecimento ===")
#Variaveis
precoGasolina = float(input("Preço da Gasolina:"))
consumoGasolina = float(input("Consumo na gasolina (km/l):"))
precoAlcool = float(input("Preço do álcooll:"))
consumoAlcool = float(input("Consumo no álcool (km/l):"))
distancia = float(input("Distância da viagem (km):"))
passageiros = int(input("Número de passageiros:"))

#Processamento

respostaGasolina = distancia / consumoGasolina * precoGasolina 
respostaGasolinaInd = respostaGasolina / passageiros

respostaAlcool = distancia / consumoAlcool * precoAlcool 
respostaAlcoolInd = respostaAlcool / passageiros

#Saída

if (respostaGasolina > respostaAlcool):
    print("Melhor Opção: Alcool")
    print("=== Custo Total ===")
    print("R$"+ str(respostaAlcool))
    print("=== Custo por pessoa ===")
    print("R$"+ str(respostaAlcoolInd))
    print("=== Enconomia ===")
    print("R$"+ str(respostaGasolina - respostaAlcool))
else:
    print("Melhor Opção: Gasolina")
    print("=== Custo Total ===")
    print("R$"+ str(respostaGasolina))
    print("=== Custo por pessoa ===")
    print("R$"+ str(respostaGasolinaInd))
    print("=== Enconomia ===")
    print("R$"+ str(respostaGasolina - respostaAlcool))
