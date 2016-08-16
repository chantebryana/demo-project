dragonHP = 50
knightHP = 20

def userPrompt (knightHP)
    print "Knight enters Dragon's lair with " + knightHP.to_s + " HP. What would you like to do?\nType \'FIGHT\' or \'RUN\', then press ENTER: "
    userChoice = gets.upcase.chomp 
    return userChoice 
end

def choiceCheck (userChoice)
    if userChoice == "FIGHT" 
        print "Initiate fighting!\n"
    elsif userChoice == "RUN"
        print "Knight successfully runs away.\n"
        
    else 
        print "Your selection doesn't match any available options. Please try again.\n"
    end
end 

#print "Knight enters Dragon's lair with " + knightHP.to_s + " HP. What would you like to do?\nType \'FIGHT\' or \'RUN\', then press ENTER: "
#userChoice = gets.upcase.chomp 

userPrompt(knightHP) 
choiceCheck(userChoice) 