dataArray = []
limit = 10
47.times {dataArray << rand(1..limit)}
dataArray.sort!
print "dataArray: " + dataArray.join(", ") + "\n"

tallyArray = Array.new(limit, 0)
mode = 0

dataArray.each do |element|
    if element
        tallyArray[element-1] += 1
    end 
end

print "tallyArray elements: "
tallyArray.each do |i| print i.to_s + " " end 
print "\n"
