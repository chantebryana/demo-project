$dragonHP = 10 #dragon starting hit points
$knightHP = 4 #knight starting hit points
dragonRoll = 0 #define dice roll parameter for dragon
knightRoll = 0 #define dice roll parameter for knight

def choiceCheck (userChoice)
    if userChoice == "FIGHT" 
        print "Initiate fighting!\n"
        $knightHP = $knightHP - rand(1..6)
        $dragonHP = $dragonHP - rand(1..6)
        print "This round ended.\nKnight has " + $knightHP.to_s + " hit points remaining.\nDragon has " + $dragonHP.to_s + " hit points remaining.\n"
        #knight rolls dice for damage to dragon; save results, report
        #dragon rolls dice for damage to knight; save results, report
    elsif userChoice == "RUN"
        print "Knight successfully runs away.\n"
    else 
        print "Your selection doesn't match any available options. Please try again.\n"
    end
end 

print "Knight enters Dragon's lair with " + $knightHP.to_s + " HP. What would you like to do?\nType \'FIGHT\' or \'RUN\', then press ENTER: "
userChoice = gets.upcase.chomp 

choiceCheck(userChoice) 
