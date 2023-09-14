#make and populate owners
owners = open("owners.txt")

with open("cumro.sql", "w") as file:
    file.write("CREATE TABLE IF NOT EXISTS cumro_owners(ownerID INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(80));")
    file.write("\n")
    while(True):
        line = owners.readline()
        if not line:
            break
        name = line.rstrip('\n')
        file.write("INSERT INTO cumro_owners (name) VALUES (\"" + name + "\");")
        file.write("\n")
file.close()

#make and populate breeds table
breeds = open("breeds.txt")

with open("cumro.sql", "a") as file:
    file.write("CREATE TABLE IF NOT EXISTS cumro_breeds(breedsID INT PRIMARY KEY AUTO_INCREMENT, breed VARCHAR(80));")
    file.write("\n")
    while(True):
        line = breeds.readline()
        if not line:
            break
        breed = line.rstrip('\n')
        file.write("INSERT INTO cumro_breeds (breed) VALUES (\"" + breed + "\");")
        file.write("\n")
file.close()

#make dogs table
dogs = open("dogs.txt")
dogBreeds = open("dogs-breeds.txt")
dogOwners = open("owners-dogs.txt")

with open("cumro.sql", "a") as file:
    file.write("CREATE TABLE IF NOT EXISTS cumro_dogs(dogsID INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(80), ownerID INT REFERENCES cumro_owners(ownerID), breedsID INT REFERENCES cumro_breeds(breedsID));")
    file.write("\n")
    while(True):
        dogline = dogs.readline()
        if not dogline:
            break
        dogName = dogline.rstrip('\n')
        file.write("INSERT INTO cumro_dogs(name) VALUES (\"" + dogName + "\");")
        file.write("\n")
    
    while(True):
        breedline = dogBreeds.readline()
        if not breedline:
            break
        line = breedline.split(';')
        dName = line[0]
        breed = line[1].rstrip('\n')
        file.write("UPDATE cumro_dogs set breedsID=(SELECT breedsID FROM cumro_breeds WHERE breed=\"" + breed + "\") WHERE name=\"" + dName + "\";")
        file.write("\n")

    while(True):
        ownerline = dogOwners.readline()
        if not ownerline:
            break
        line = ownerline.split(';')
        owner = line[0]
        dogs = line[1].split(',')
        dogs[len(dogs)-1] = dogs[len(dogs)-1].rstrip('\n')
        for dog in dogs:
            file.write("UPDATE cumro_dogs set ownerID=(SELECT ownerID FROM cumro_owners WHERE name=\"" + owner + "\") WHERE name=\"" + dog + "\";")
            file.write("\n")
        file.write("\n")

file.close()
print("done writing file")