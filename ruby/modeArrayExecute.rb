require "./modeArrayP62.rb"

print "TOP LIMIT OF RANDOM NUMBER GENERATOR\nUser, input an integer then press ENTER: "
range = gets.chomp.to_i

print "DEFINE HOW OFTEN TO REPEAT\nUser, input an integer then press ENTER: "
reps = gets.chomp.to_i

puts "Here's your mode: " + modeTrials(range, reps).to_s + "\n"