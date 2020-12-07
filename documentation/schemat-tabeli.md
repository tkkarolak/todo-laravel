# Schemat tabel

## Tabela 1 - job_list

| Kolumna     | Typ             | Opis                                 |
| ----------- | --------------- | ------------------------------------ |
| id          | unsigned bigint | Id zadania (PK)                      |
| user_id     | unsigned bigint | Id użytkownika (FK)                  |
| description | varchar         | Opis zadania                         |
| priority_id | integer         | Priorytet zadania (FK)               |
| deadline    | timestamp NULL  | Najpóżniejsza data wykonania zadania |
| executed    | boolean         | Czy zadanie zostało wykonane         |
  
## Tabela 2 - users

| Kolumna           | Typ             | Opis                       |
| ----------------- | --------------- | -------------------------- |
| id                | unsigned bigint | Id użytkownika (PK)        |
| name              | varchar         | Imię użytkownika           |
| email             | varchar         | Adres e-mail (unikatowy)   |
| email_veridied_at | timestamp NULL  | kiedy zweryfikowano e-mail |
| password          | varchar         | hasło użytkownika          |
| remember_token    | varchar NULL    | token                      |
| created_at        | timestamp NULL  | data utworzenia            |
| updated_at        | timestamp NULL  | data ostatniej edycji      |

## Tabela 3 - priorities

| Kolumna     | Typ             | Opis                           |
| ----------- | --------------- | ------------------------------ |
| id          | unsigned bigint | id priorytetu (PK)             |
| priority    | integer         | liczbowe określenie priorytetu |
| description | varchar         | opis priorytetu                |
