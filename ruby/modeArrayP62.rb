def modeTrials (range, reps)
    dataArray = []
    limit = range
    reps.times {dataArray << rand(1..limit)}
    dataArray.sort!
    
    tallyArray = Array.new(limit, 0)
    mode = 0
    runningTally = 0
    
    dataArray.each do |element|
        tallyArray[element-1] += 1
    end
    
    tallyArray.each_with_index do |element, index|
        if element > runningTally 
            runningTally = element
            mode = index + 1
        end 
    end
    return mode
end

print "TOP LIMIT OF RANDOM NUMBER GENERATOR\nUser, input an integer then press ENTER: "
range = gets.chomp.to_i

print "DEFINE HOW OFTEN TO REPEAT\nUser, input an integer then press ENTER: "
reps = gets.chomp.to_i

puts "Here's your mode: " + modeTrials(range, reps).to_s + "\n"