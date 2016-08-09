dragonHP = 50
knightHP = 20

print "Knight enters Dragon's lair with " + knightHP.to_s + " HP. What would you like to do?\nType \'FIGHT\' or \'RUN\': "
userChoice = gets.upcase.chomp 

print userChoice + "\n"

#userChoice functon