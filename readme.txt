=== Plugin Name ===
Contributors: simply4net, mateuszgbiorczyk
Tags: ecommerce, widget, buybox
Requires at least: 4.7.0
Tested up to: 5.8
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Wtyczka pozwala zintegrować Twoją witrynę z komercyjną usługą BUY.BOX. Umożliwia dodawanie w prosty i szybki sposób widżetów BUY.BOX na stronie bloga.

== Opis ==

Wtyczka pozwala zintegrować Twoją witrynę z komercyjną usługą [BUY.BOX](http://getbuybox.com/). Umożliwia dodawanie w prosty i szybki sposób widżetów BUY.BOX na stronie bloga.

Więcej informacji na temat wtyczki znajdziesz na [naszej stronie](https://docs.getbuybox.com/wtyczka-do-wordpressa/ ).

== Instrukcja instalacji ==

1. Prześlij pliki pluginu do katalogu `/wp-content/plugins/buybox-widget` lub zainstaluj używając podstrony `Wtyczki` w panelu administracyjnym.
2. W celu aktywacji wtyczki przejdź na podstronę `Wtyczki` w panelu administracyjnym.
3. Aby skonfigurować wtyczkę należy użyć podstrony `Ustawienia -> Widget BUY.BOX`.

== Frequently Asked Questions ==

= Co mogę zrobić, jeżeli nie widzę widżetu na stronie? =

Aby sprawdzić potencjalne błędy dotyczące walidacji shortcode sprawdź plik `debug.log` w katalogu `/wp-content/` - w tym celu musisz mieć włączony [tryb debugowania](https://codex.wordpress.org/WP_DEBUG/) z aktywną wartością `WP_DEBUG_LOG`). Sprawdź również konsolę w swojej przeglądarce, w celu weryfikacji ewentualnych błędów w kodzie JavaScript.

Jeżeli nadal będziesz miał problem, prosimy o kontakt z nami za pomocą [naszej strony](http://help.getbuybox.com/).

= Informacje dla użytkowników wersji 1.0 =

Nowa wersja wtyczki nie zastępuje automatycznie starego sposobu dodawania widgetów BUY.BOX w postach obsługiwanych przez wersję 1.0. Możesz mieć zainstalowane jednocześnie obydwie wersje. Zalecamy jednak korzystanie z najnowszej wersji dla nowych postów i ewentualne pozostawienie starszej wersji (w celu obsługi starszych postów).

W razie potrzeby możesz również edytować swoje stare posty i zastąpić istniejącą konfigurację postów BUY.BOX dodając odpowiedni shortcode.

= Jaka jest minimalna wymagana wersja PHP? =

Minimalna wymagana wersja PHP to 5.4. W środowiskach z niższą wersją PHP wtyczka się nie uruchomi.

== Screenshots ==

1. Zrzut ekranu strony ustawień

== Changelog ==

= 3.1.5 =
* Aktualizacja domeny API.

= 3.1.4 =
* Usunięcie zbędnego parametru.

= 3.1.3 =
* Zmiana linków do generatora oraz pomocy.

= 3.1.2 =
* Przetestowane na wersji wp 5.8
* Zmiana wersji api widgetu

= 3.1.1 =
* Poprawiona błąd z deklaracją wersji

= 3.1.0 =
* Przygotowano blok dla edytora Gutenberg
* Przebudowano silnik wtyczki
* Dodano możliwość trwałego ukrycia notyfikacji w panelu administracyjnym

= 3.0.2 =
* Dodano automatyczne pobieranie listy kategorii przy użyciu API Token
* Zablokowano możliwość instalacji wtyczki w środowiskach z wersją PHP starszą niż 5.4
* Zmodyfikowano system notyfikacji przy wstawaniu shortcode

= 3.0.1 =
* Dodano nowy widget popover 
* Dodano opcję wyróżnienia shortcode w edytorze TinyMCE

= 3.0.0 =
* Przebudowano silnik wtyczki
* Zmieniono system wersjonowania wtyczki
* Zmodyfikowano stronę konfiguracji
* Usprawniono dodawanie shortcode w edytorze
* Dodano wsparcie dla nowych kategorii: Art. dziecięce, Odzież, Sport, Gry planszowe, Inne
* Dodano obsługę błędów za pomocą debug.log
* Dodano notyfikacje w panelu administracyjnym
* Zaktualizowano kod implementacji widżetów BUY.BOX
* Wyłączono wykorzystanie jQuery przez widżety
* Dodano tryb czyszczenia danych konfiguracji w trakcie usuwania wtyczki
* Dodano wsparcie dla tłumaczeń

= 2.7 =
* Zmodyfikowano adres wyszukiwania produktów

= 2.6 =
* Dodano wsparcie dla HTTPS
* Przetestowano wtyczkę z wersją WordPressa 4.6 i 4.7

= 2.5 =
* Dodano wsparcie dla nowej kategorii: Elektronika
* Zmodyfikowano dodawanie shortcode dla kategorii Kosmetyki
* Przetestowano wtyczkę z wersją WordPressa 4.5

= 2.4 =
* Dodano możliwość wyłączania ładowania jQuery
* Wyłączona możliwość wyszukiwania produktów dla kategorii Kosmetyki wg nazwy

= 2.3 =
* Zaktualizowano okno dialogowe podczas dodawania shortcode

= 2.2 =
* Zaktualizowano obsługę wielu kodów ISBN / EAN

= 2.1 =
* Zmodyfikowano nazewnictwo funkcji wewnątrz pluginu w celu uniknięcia konflików z wersją 1.0

= 2.0 =
* Przebudowano silnik wtyczki
* Dodano możliwość tworzenia shortcode w edytorze
* Dodano obsługę wielu widżetów na jednej stronie

= 1.0 =
* Pierwsza stabilna wersja