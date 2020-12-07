## Tabela 1 - job_list

| Kolumna         | Typ       | Opis                        |
| ----------------|-----------|-----------------------------|
| id              | id        | Id zadania (PK)             |
| user_id         | foreignId | Id użytkownika (FK)         |
| job_description | string    | Opis zadania                |
| priority        | integer   | Priorytet zadania           |
| executed        | boolean   | Czy zadanie zostało wykonane|

## Tabela 2 - users

| Kolumna         | Typ       | Opis                        |
| ----------------|-----------|-----------------------------|
| id              | id        | Id użytkownika (PK)         |
| name            | string    | Imię użytkownika            |
| email           | string    | Adres e-mail (unikatowy)    |

^^^^^^^ dobra, nie wiem co tu robię, nie będę udawać.