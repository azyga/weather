Kilka informacji odnośnie zastosowanych rozwiązań w zadaniu:

1. Problem z MySQL
Napotkałem jakiś problem z serverem MySQL, pomimo różnych prób rozwiązania go nie udało mi się go uruchomić. W związku z tym część zadania dotycząca komunikacji z bazą danych została przygotowana bez testowania. Pozostałe obejścia:
- przygotowałem ręcznie plik z migracją danych,
- Stworzyłem encje, metody do komunikacji z DB, jednak ich wywołania pozostały zakomentowane aby nie powodowac błędów,
- Aby nie zaśmiecać klasy dodałem krótką tablicę z 3 krajami do wyboru. Domyślnie pełna lista powinna być wczytywana z bazy danych

2. Lokalizacja miasta
Aby uniknąć zwracania różnych miast przez API skorzystałem z dodatkowego API zwracającego współrzędne wybranego miasta, i na ich podstawie pobierane są dane pogodowe. Dla uproszczenia z API geolokalizacyjnego pobierany jest pierwszy wynik.

3. Uśrednione dane
Nie miałem pomysłu w jaki sposób uśredniać dane opisowe ("Cloudy", "Partly cloudy" itp.), dlatego są one pobierane z jednego źródła. W przypadku braku odpowiedzi pozostają one puste. Pozostałe dane (Temperatura, ciśnienie, wilgotność) są uśredniane. 
