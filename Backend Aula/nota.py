print("=== Analise de Aprovção ===")

nota1 = int(input("Nota 1° Bimestre ===>  "))
nota2 = int(input("Nota 2° Bimestre ===>  "))
nota3 = int(input("Nota 3° Bimestre ===>  "))
nota4 = int(input("Nota 4° Bimestre ===>  "))

total = nota1+nota2+nota3+nota4
media = total / 4

# if(media >= 60):
#     print("=======================")
#     print("| =+= Aprovado XD =+= |")
#     print("=======================")
#     print(media)
# else:
#     print("======================")
#     print("| += Reprovado X( =+ |")
#     print("======================")
#     print(media)

if(media >= 100):
    print("=== Fala dele 😎 ===")    
elif(media >= 90):
    print("=== Parabéns, Você foi execelente! XD ===")
elif(media >= 80):
    print("=== Sua nota foi muito boa! ===")
elif(media >= 70):
    print("=== Nota Boa 👍 ===")
elif(media >= 60):
    print("=== Passou Raspando ===")
else:
    print("=== Infelizmente reprovou! X( ===")