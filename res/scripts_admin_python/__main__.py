"""Auteur : Lucca HOOGENBOSCH
"""

##Modules##
import csv

#Champs des fleurs sauvages locales - Entetes
"""id,espece,stock,latin,famille,cycle,couleur,debut_floraison,
fin_floraison,hauteur,debut_semis,fin_semis,type_semis,culture,technique,
exposition,pollinisateur,infos"""

donnees = []

def traitement(chemin_csv):
    """Fonction traitant le CSV (sep = ;) entrant et l'implémant sous forme de
    liste Python. (Liste de listes, tableau)

    Args:
    -----
        chemin_csv (STRING): Chemin du fichier CSV
    """
    with open(chemin_csv, mode='r') as f:
        lecture = csv.reader(f, delimiter=';')
        ligne = 0
        for row in lecture:
            if ligne == 0 or ligne == 1:
                ligne += 1

            else:
                if row[4] == 'Annuelle':
                    row[4] = 1
                elif row[4] == 'Bisannuelle':
                    row[4] = 2
                elif row[4] == 'Vivace':
                    row[4] = 3

                row6 = row[6].split("-")
                if row[6] == '':
                    row6.append('')
                    row6.append('')

                row8 = row[8].split("/")
                row8 = row8[0].split("-")
                if row[8] == '':
                    row8.append('')
                    row8.append('')

                if row[9] == 'oui' or row[9] == 'Oui':
                    row[9] = 1
                elif row[9] == 'non' or row[9] == 'Non':
                    row[9] = 0

                if row[11] == 'S':
                    row[11] = 1
                elif row[11] == 'Mo':
                    row[11] = 2
                elif row[11] == 'O':
                    row[11] = 3
                elif row[11] == 'S+Mo':
                    row[11] = 4

                if row[13] == 'oui' or row[13] == 'Oui':
                    row[13] = 1
                elif row[13] == 'non' or row[13] == 'Non':
                    row[13] = 0

                donnees.append(['',row[0],row[1],row[2],row[3],row[4],row[5],row6[0],
                row6[1],row[7],row8[0],row8[1],'',row[9],row[10],row[11],row[13],
                row[14]])
                ligne += 1

def ecriture(chemin_sortie):
    """Fonction écrivant un nouveau fichier CSV prêt à être lu
    par PHP myAdmin. Le CSV a pour délimiteur des virgules

    Args:
        chemin_sortie (STRING): Chemin du fichier de sortie CSV
    """
    with open(chemin_sortie, newline ='', mode='w') as f:
        ecrire = csv.writer(f, delimiter = ',')
        ligne = 0
        for liste in donnees:
            ecrire.writerow(donnees[ligne])
            ligne += 1

if __name__ == '__main__':
    traitement('Fleurs_Sauvages_Locales.csv')
    ecriture('Fleurs_Sauvages_Locales_Convertis.csv')