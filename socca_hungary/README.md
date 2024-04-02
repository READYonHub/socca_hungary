# Socca_hungary

## trello  :                https://trello.com/b/kQYQe3Oy/soccahungary

## github repository cim:   https://github.com/READYonHub/socca_hungary.git

## public domain cim:       socca-hungary-jatekos-kartya.netlify.app


## Hasznalat
* na szóval, ez úgy müködik, hogy ha wamppserver-ben a www mappában tudod a wordpress-t szerkeszteni, minden ugyanaz mint a xampp-nál.
* a lenyeg, ha feltoltod a git repoba akkor a netlify bizonyos idokozonkent checkolja ezt a repot, es ha ez megvan akkor latod nyilvánosan a public domain cimen.
* felül van minden link ami kell

## egyeb

* hogyan lehet hostolni git repobol wordpress oldalt, link : https://www.youtube.com/watch?v=5H_K-SAMLpE&ab_channel=CodingWithAnkit

## Adatbazis:

* az adabazist megtalalod a repoban:  socca_hungary_db.sql

### Táblák:

  1. jatekos_adatok (Játékosok)
   
        player_id (egyedi azonosító)
        name (játékos neve)
        registration_number (regisztrációs szám)
        validity_date (érvényesség dátuma)
        status (játékos státusza, pl. "érvényes" vagy "eltiltva")
        suspension_start_date (eltiltás kezdete, ha érvénytelen)
        suspension_end_date (eltiltás vége, ha érvénytelen)

  2. jatekos_egeszseg (Egészségügyi adatok)
   
        record_id (egyedi azonosító)
        player_id (játékos azonosítója)
        blood_group (vércsoport)
        drug_allergies (gyógyszerérzékenység)

  3. tartalom_hirek (Hírek)
        news_id (egyedi azonosító)
        title (hír címe)
        content (hír tartalma)
        published_date (hír közzétételének dátuma)

### Kapcsolatok:

        A játékosok táblája és az egészségügyi adatok táblája között        egy-játékos-több-egészségügyi-adat kapcsolat van (1:N).
        A hírek táblája önálló, nincs más táblához való kapcsolat.

