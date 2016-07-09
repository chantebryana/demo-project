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

puts "Here's your mode: " + modeTrials(10, 47).to_s + "\n"