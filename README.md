# SNIR_1

https://www.youtube.com/watch?v=n5gor3Bdmmk#t=795s

---

https://circuitdigest.com/microcontroller-projects/arduino-xbee-module-interfacing-tutorial

https://www.instructables.com/How-to-Use-XBee-Modules-As-Transmitter-Receiver-Ar/

---

## QT

```cpp
#include "mainwindow.h"
#include "ui_mainwindow.h"
#include <QMessageBox>
#include <QPixmap>
#include <QFile>
#include <QTextStream>
#include <QFileDialog>
#include <QDir>


void MainWindow::on_pushButton_clicked()
{
    QFile file("Chemin/nom.txt");
    if (!file.open(QFile::WriteOnly | QFile::Text)) {
        QMessageBox::warning(this,"title","file not open");
    }
    QTextStream out(&file);
    QString text = ui->plainTextEdit->toPlainText();
    out << text;
    file.flush();
    file.close();
}


void MainWindow::on_pushButton_2_clicked()
{
    QFile file("/Chemin/nom.txt");
    if (!file.open(QFile::ReadOnly | QFile::Text)) {
        QMessageBox::warning(this,"title","file not open");
    }
    QTextStream in(&file);
    QString text = in.readAll();
    ui->plainTextEdit->setPlainText(text);
    file.close();
}
```

---

```cpp
#include <SD.h>
#include <SPI.h>

File myFile;

int pinCS = 10; // Pin 53 on Arduino Mega

void setup() {
    
  Serial.begin(9600);
  pinMode(pinCS, OUTPUT);
  
  // Initialisation carte SD
  if (SD.begin())
  {
    Serial.println("Carte SD est prète à être utilisée.");
  } else
  {
    Serial.println("Echec de l'initailisation de la carte SD");
    return;
  }
  
  // Création/Ouverture du fichier 
  myFile = SD.open("Test.txt", FILE_WRITE);
  
  // Si le fichier est bien ouvert, on écrit dans le fichier :
  if (myFile) {
    Serial.println("Ecriture dans le fichier ...");
    // Ecriture dans le fichier
    myFile.println("Texte de test 1, 2 ,3...");
    myFile.close(); // Ferméture du fichier
    Serial.println("Terminé.");
  }
  // Si le fichier ne peut pas être ouvert, afficher erreur :
  else {
    Serial.println("erreur d'ouverture du fichier Test.txt");
  }

  // Lecture du fichier
  myFile = SD.open("Test.txt");
  if (myFile) {
    Serial.println("Lecture :");
    // Lire tout le fichier
    while (myFile.available()) {
      Serial.write(myFile.read());
   }
    myFile.close();
  }
  else {
    Serial.println("Erreur d'ouverture Test.txt");
  }
  
}
void loop() {
  // empty
}

