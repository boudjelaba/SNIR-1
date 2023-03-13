# SNIR-1

https://www.youtube.com/watch?v=n5gor3Bdmmk#t=795s

---

https://www.framboise314.fr/wp-content/uploads/2017/11/03_1_1_InstallationQt_LED_v2.pdf

https://www.electronicsforu.com/electronics-projects/setting-qt-software-on-raspberry-pi

```python
# Définition de fonction ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
def minMaxMoy(liste) :
    """Renvoie le min, le max et la moyenne de la liste."""
    mini, maxi, som = liste[0], liste[0], float(liste[0])
    for i in liste[1:]:
        if i < mini :
            mini = i
        if i > maxi :
            maxi = i
        som += i
    return (mini, maxi, som/len(liste))

# Programme principal =========================================================
lp = [10, 18, 14, 20, 12, 16]

print("liste =", lp)
l = minMaxMoy(lp)
print("min : {0[0]}, max : {0[1]}, moy : {0[2]}".format(l))
```

---
---

```python
while True:
    try:
        x=int(input("Veuillez saisir un nombre:"))
        break
    except ValueError:
        print("Ceci n'est pas un nombre!!! Essayez de nouveau ...")
print("Ok!")
```

---
---
