import csv

"""
NOM COLONNES A COPIER COLLER

id,espece,stock,latin,famille,cycle,couleur,debut_floraison,
fin_floraison,hauteur,debut_semis,fin_semis,culture,technique,exposition,pollinisateur,infos

"""

def traitementFsl(chemin):
    """
    Fonction traitementFsl
    """
    headers = ['id','espece','stock','latin','famille','cycle','couleur','debut_floraison',
    'fin_floraison','hauteur','debut_semis','fin_semis','culture','technique','exposition','pollinisateur','infos']

    fileCsv = open(chemin,'r')
    fileWrite = open('FSLCONV.csv','w')

    for line in fileCsv.readlines():
        

        data = line.split(';')
        line = []
        line.append('0') #ID

        for el in range(len(headers)-2):
            if (el == 6 or el == 8):
                
                if data[el] == '':
                    line.append('')
                    line.append('')
                else:
                    temp = data[el].split('-')
                    #print(temp)
                    line.append(temp[0])
                    line.append(temp[1])
            
            else:
                line.append(data[el])

        
        #print(len(line))
        s = ','.join(line)
        s = s[:-1]
        print(s)
        fileWrite.write(s)
        fileWrite.write('\n')
    
    fileCsv.close()
    fileWrite.close()
        

pass