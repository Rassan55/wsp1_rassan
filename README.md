# wsp1_rassan

# Project blogg

### Projektplan
Iden var att man skulle kunna se kommentarer, skapa inlägg, söka efter specifika saker. Även att de tidigare saker vi använt oss av skulle vara med.

### Betygsmål
Jag satsade mest på att bli klar med projektet. Jag satsade mest på betyg e, men kan ändå ha gjort saker för c fast jag inte tänkte på det. Jag gjorde inte heller bonus uppgifterna för högre betyg för jag kände att jag inte hann.

### Genomförandet

#### Läs mer länken
Jag började med att göra läs mer länken. Man ska då se de första 10 orden. Men jag gjorde först de 10 tecknena. Jag använde mig av foreach, där jag hade explode, array_slice och implode.  Med dessa funktioner kunde jag få de första 10 orden.

#### Kommentarer
Jag gick sedan över till att göra kommentarer till inläggen. Jag gjorde minst en kommentar till varje inlägg. Jag gjorde en fil som connectar till databasen. Det blir en variabel man kan använda sig av. Jag gjorde även en fil som heter comments.php. Jag satte in funktionen så att den connectar till databasen i denna filen. I comments.php hämtar jag information från databasen med sql. Jag hämtar från users och comments. Jag gör sedan en foreach. Jag har även en foreach i single-blog-post-template.php för comments, som skriver ut comments.

#### Sortera
Efter kommentarer gick jag över till att man kan välja hur inläggen ska sorteras. Man kan sorter efter fallande eller stigande. Jag gjorde i all-blog-post-template.php ett form och använde mig av method post. Jag gjorde även input för fallande och stigande i form. Jag gjorde även i model en variabel som heter orderby vilket är sortera knappen.

#### Söka/filtrera
Sedan gick jag över till att göra sök funktionen. Jag gjorde input för söka och text. Jag gjorde även variabler för dessa i all-blog-post-template.php.

#### Skapa inlägg
Som sist så gjorde jag att användarna ska kunna göra ett inlägg på sidan. Jag började med att göra en fil för det som heter posta-template.php. Jag hämtade sedan user från databasen och gjorde en array för users. Sedan gjorde jag formuläret med funktionen post. I den gör jag en texrutan där man skriver sitt inlägg. Man väljer också vilken användare man är. Även vad titeln är. Sist är submit knappen. Jag gör sedan en if sats om sumbit är satt så görs variabler med värden. Sedan lägger man in informationen i databsen. Om det funkar så får man meddelandet bra, annars fel.

### Reflektion
Jag kunde ha kommenterat mer i min kod eftersom jag har svårt att komma ihåg vad precis jag gjorde. Jag skriver dock detta väldigt långt efter jag gjorde koden, vilket heller inte är optimalt. Kunde följt planeringen bättre så att jag inte hamnade efter. Jag kunde ha provat mig mer innan jag frågade efter hjälp. Fast jag hade lite svårt att förstå hur jag skulle få ihop exemplena jag hittade på webben med uppgiften. Jag får försöka hitta exempel som passa uppgiften bättre nästa gång. Detta går även in i att jag hade svårt att veta vad jag skulle göra, utan att fråga efter hjälp. Men jag känner ändå att jag lärde mig lite mer om hur foreach och if sater funkar. Jag lärde mig mer av uppgiften. Jag borde också ta upp att jag frågade mycket om hjälp fast det är bra så att man inte fastnar. I helhet så gick uppgiften ändå bra med tanke på att jag lärde mig saker och att jag blev klar.

### Commits

#### 9 November 2018
PDO and Blogging labration.
Blogging var uppstarten för labrationer. Där man skulle göra inlägg, användare och kommentarer.  VI använde oss också av associativ Array, foreach, for, Page Controller, array

På  PDO byggde vi vidare på blogging. Vi kopplade den till vår databas också. Avände också en del phpadmin. Vi använde oss av ATTRIBUT, POPULERA ARRAY, TECKENKODNING, läsa mer länkar, SORTERING, FÖRFATTARE, SQL, TESTA ANSLUTNING. TESTA VÅRT PDO-OBJEK, skapade anslutning.
