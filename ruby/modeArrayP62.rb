dataArray = []
limit = 5
47.times {dataArray << rand(1..limit)}
#dataArray = [1, 2, 3, 4, 5, 3, 3, 3, 3, 4, 4]
dataArray.sort!
print "dataArray: " + dataArray.join(", ") + "\n"

tallyArray = Array.new(limit, 0)
mode = 0

dataArray.each do |element|
    if element
        tallyArray[element-1] += 1
    end 
end

print "tallyArray printout: \n"
tallyArray.each_with_index do |e, i| 
    print "index " + i.to_s + ", element " + e.to_s + "\n"
end 

tallyArray.each_with_index do |element, index|
    if element > mode
        mode = index + 1
    end 
end
print "mode equals the number " + mode.to_s + "\n"