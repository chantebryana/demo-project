dataArray = []
limit = 10
47.times {dataArray << rand(1..limit)}
dataArray.sort!
print "dataArray: " + dataArray.join(", ") + "\n"

tallyArray = Array.new(limit, 0)
mode = 0
runningTally = 0

dataArray.each do |element|
    tallyArray[element-1] += 1
end

print "tallyArray printout: \n"
tallyArray.each_with_index do |e, i| 
    print "the number " + (i+1).to_s + " occurs " + e.to_s + " time(s)\n"
end 

tallyArray.each_with_index do |element, index|
    if element > runningTally 
        runningTally = element
        mode = index + 1
    end 
end
print "mode equals the number " + mode.to_s + "\n"