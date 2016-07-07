dataArray = []
7.times {dataArray << rand(1..3)}
dataArray.sort!
print "dataArray: " + dataArray.join(", ") + "\n"

tallyArray = Array.new(3, 0)
mode = 0

dataArray.each do |element|
    if element
        tallyArray[element-1] += 1
    end 
end

tallyArray.each do |i| print i.to_s + " " end 