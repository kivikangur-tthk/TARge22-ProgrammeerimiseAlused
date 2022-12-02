def ask_and_sum_two_numbers():
    number1 = float(input("Sisesta esimene arv: "))
    number2 = float(input("Sisesta teine arv: "))
    # sum_of_2 = number1 + number2
    print(f"{number1}+{number2}={number1+number2}")
    
if __name__ == "__main__":
    ask_and_sum_two_numbers()