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
        file.write("INSERT INTO Cumro_owners (name) VALUES (\"" + name + "\");")
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
        file.write("INSERT INTO Cumro_breeds (breed) VALUES (\"" + breed + "\");")
        file.write("\n")
file.close()

print("done writing file")