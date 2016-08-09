dragonHP = 50
knightHP = 20

print "Knight enters Dragon's lair with " + knightHP.to_s + " HP. What would you like to do?\nType \'FIGHT\' or \'RUN\': "
userChoice = gets.upcase.chomp 

def choiceCheck (userChoice)
    if userChoice == "FIGHT" 
        print "Initiate fighting!\n"
    elsif userChoice == "RUN"
        print "Initiate running!!\n"
    else 
        print "Your selection doesn't match any available options. Please try again.\n"
    end
end 

choiceCheck(userChoice) 