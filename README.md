# Platforma este live la adresa [ironcoders.com](http://ironcoders.com/) #

## IronCoders is an online platform that facilitates learning of programming through specialised tools and resources.	
It is one of my first projects that I have worked on during high school, more specifically 10th and 11th grade.

## Video demo
[![](http://img.youtube.com/vi/ziCL3cjkdRs/0.jpg)](http://www.youtube.com/watch?v=ziCL3cjkdRs "IronCodersDemo")

![1.png](https://github.com/msorins/IronCoders/image-demo1.png)

![2.png](https://github.com/msorins/IronCoders/image-demo2.png)

![3.png](https://github.com/msorins/IronCoders/image-demo3.png)

## Platforma este impartita in mai multe module : ##
Arhiva de probleme
Arhiva educationala
Monitorul de evaluare
Compilator online ( IDE )
Cursuri interactive
Competitii
Clase virtuale
Management surse
Blog
Forum
Chat

## Platform's modules :
Archive of problems + educational archive
Evaluation Monitor
IDE 
Interactive courses 
Competitions 
Virtual classes 
Forum

## Archive of problems
Is the first working module of IronCoders, as its name says it contains a list of problems which can be solved by the members of the site (using the integrated IDE or uploading directly the source code). Problems are classified into two big categories 
The educational archive: where all the problems are made specially to emphasise a single algorithm (with all the explications needed)
The contest & olympiad archive 
 Each code is evaluated and graded automatically by the same criteria that are present at olympics (time and memory) . 
Problems can be uploaded with ease by anyone and for every problem there is created automatically a thread on the forum (which is phpbb) and in this way the comment section was made. 
Through the evaluation monitor, users can see how their code performed, they can find out on which tests their program failed and why (wrong answer, time limit exceeded ,how much memory was used).  It is not possible to view other sources until you managed to achieve 100 points (the maximum), unless the problem is in the educational archive (where it is beneficial to see how others did it and learn from it).

## IDE
It mades coding possible without the need of an external program, also, in order to create a more complete user experience,  this module is integrated with the ‘archive of problems’. Currently , C++ and C are available (the main two languages used in Romanian Schools), in the future of course that there is a plan to implement new languages.

## Interactive Courses
Is one of the most important modules of the platform. As it names says it represents a more useful way of learning how to code. It basically makes all the process interactive, by organizing all the lessons in two parts, a theoretical and a practical one (the page is split in two parts, in one of them you can view the theory, and after that, you can complete the requested programming part in order to advance to the next lesson). Also, this module is designed to permit a custom feedback for every part of the code that is written , so that each user can discover (and understand) exactly what are the problems in their code and fix them.
By using AJAX, it is possible to complete the lessons without refreshing the page, making the process a lot smoother. 

## Competitions
Was made in order to give the users the possibility to test their knowledges against others. There are 2 type of contests, the official one (organized by a member of the staff), and the regular one which can be created by everybody (they are usually used before the olympics to simulate a similar experience),  the contest can be configured to last a variable amount of time and to begin at a certain time. When a contest has finished, a ranking page is created and all the evaluation reports are made available for the participant .

## Virtual classes
Offers a similar experience to the atmosphere of a real classroom, where a few designated person have the possibility to teach others, to give assignments , evaluate them, to chat with them (for every class there is another instance of the ‘chat’ module) .

---
## Management surse

Cu toate ca sursele trimise spre evaluare iti sunt salvate si pot fi accesate oricand, acest sistem iti va permite sa iti organizezi toti algoritmii scrisi astfel incat sa ii poti accesa oricand si de oriunde.


## Forum ##

Tot ce tine de informatica poate fi discutat aici , orice intrebare poate fi pusa si un membru al site-ului va posta un raspuns in decursul a cateva ore.

De asemenea, pentru fiecare problema este automat facut cate un topic pe forum care este legat la arhiva de probleme. Astfel este implementat un sistem de comentarii, util utilizatorilor care au anumite nedumeriri despre problema .

Pentru o mai buna experienta a utilizatorilor, fiecare membru are o pagina de profil unde sunt scrise informatii despre el precum si o lista cu toate problemele rezolvate sau toate problemele incercate.

Forum-ul se bazeaza pe platforma nodebb , iar restul modulelor sunt facute de mine. Comunicarea dintre modulele site-ului ( care sunt baza pe MYSQL ) si forum ( Mongo ) se face prin jSON

De asemenea, in curs de constructie se afla un nou modul JuniorCoders care folosind programarea vizuala, prin intermediul unor jocuri va permite copiilor sa invete principile programarii.
Acest modul va fi realizat folosind stack-ul MEAN.

### Tehnologii ###
Modulele principale ale site-ului sunt bazate pe stack-ul LAMP:

* Javascript
* jQuery
* AJAX
* PHP
* SQL
* Bootstrap

Forum-ul si modulul de juniorCoders sunt bazate pe stack-ul MEAN:

* MongoDB
* Angular2
* Javascript
* NodeJs


## Parti de cod importate ##
* Fisierul C care se ocupa cu monitorizarea memoriei si a timpului fiecarui program ( de pe Infoarena ). Pe deasupra evaluatorul este scris de mine in PHP
* Forum NodeBB
* Bootstrap - FrameWork FrontEnd
* Ace Text editor 
* Snippets from StackOverflow
* Docker pentru virtualizarea unui container in care se evalueaza toate sursele triise
