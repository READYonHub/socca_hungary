import hashlib

# Az 'qrcode' könyvtár importálása
import qrcode

# QRCode objektum létrehozása és konfigurálása
qr = qrcode.QRCode(
    version=1,  # QR kód verziója (1-40, ahol 1 a legkisebb és 40 a legnagyobb)
    error_correction=qrcode.constants.ERROR_CORRECT_L,  # Hibajavítási szint beállítása (L, M, Q, H)
    box_size=10,  # Egy QR kód egyik moduljának mérete (pixelben)
    border=4      # A QR kód körüli fehér keret mérete (modulokban)
)

with open("jatekosToQR.txt", "r") as file:
    jatekosToQR = file.read()
    

# Az adat hozzáadása a QRCode objektumhoz (ez lehet URL, szöveg, stb.)
qr.add_data("https://soccahungary.hu/"+jatekosToQR)

# A QR kód képének létrehozása
img = qr.make_image()

# A QR kód képének mentése
img.save("./playerQRcodes/qrcode.jpg")