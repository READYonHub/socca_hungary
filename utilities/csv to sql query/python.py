import csv

# Nyissuk meg a .csv fájlt olvasásra
with open('jatekosok.csv', mode='r', encoding='utf-8') as csv_file:
    csv_reader = csv.reader(csv_file, delimiter=',')
    # Kihagyjuk az első sort, mert az fejléc
    next(csv_reader, None)  
    
    # Nyissuk meg a SQL lekérdezések fájlját írásra UTF-8 kódolással
    with open('sql_lekerdezes.txt', mode='w', encoding='utf-8') as sql_file:
        # Iterálunk a sorokon
        for row in csv_reader:
            # Az adatok kinyerése a sorból
            date, name, registration_number, status = row
            
            # A statusz értékének SQL formátumba alakítása
            if status.lower() == 'érvényes':
                status_sql = "'érvényes'"
            else:
                status_sql = "'eltiltva'"
            
            # Az SQL utasítás összeállítása
            sql_statement = f"INSERT INTO jatekos_adatok (name, registration_number, validity_date, status) VALUES ('{name}', '{registration_number}', '{date}', {status_sql});\n"
            
            # Az SQL utasítások írása a fájlba
            sql_file.write(sql_statement)

print("Az SQL lekérdezések sikeresen ki lettek írva a sql_lekerdezes.txt fájlba.")
