owners = open("owners.txt")

#make and populate owners
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
print("done writing file")