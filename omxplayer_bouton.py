#!/usr/bin/env python

from time import sleep
import os
import RPi.GPIO as GPIO

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
GPIO.setup(17, GPIO.IN)
GPIO.setup(18, GPIO.IN)

print("----------------------------")
print(" Lecteur MP3 et MP4 (Vidéo) ")
print("----------------------------")

print("------****************------")
print GPIO.input(17)
print GPIO.input(18)
print("------****************------")
while True:
     	if ( GPIO.input(17) == False ):
               	print("Bouton MP3 Appuyé")
				sleep(3)
               	os.system('omxplayer -o local NomFichier1.mp3 &')
	
		if ( GPIO.input(18) == False ):
                print("Bouton MP4 Appuyé")
                sleep(3)
                os.system('omxplayer -o hdmi NomFichier2.mp4 &')

"""
	hdmi – Le son sera émis vers l'appareil connecté au port HDMI.
    local – Forcer la sortie vers la prise casque analogique.
    both - Sorties audio vers les connexions HDMI et analogiques du RPi.
"""