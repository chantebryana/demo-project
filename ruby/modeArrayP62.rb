=begin 
dataArray = []
41.times {dataArray << rand(1..10)}
dataArray.sort!
dataArray.map {|i| print i.to_s + " "}

counts = Hash.new(0)
dataArray.each {|value| counts[value] += 1}
counts.each {|i| print i.to_s + " "}
=end

dataArray = []
7.times {dataArray << rand(1..3)}
dataArray.sort!
print "dataArray: " + dataArray.join(", ") + "\n"

tallyOne = 0
tallyTwo = 0
tallyThree = 0
mode = 0

dataArray.each do |element| 
    if element == 1
        tallyOne += 1
    elsif element == 2
        tallyTwo += 1
    elsif element == 3
        tallyThree += 1
    else
        print "error!\n"
    end 
end

print "tallyOne: " + tallyOne.to_s + "\n"
print "tallyTwo: " + tallyTwo.to_s + "\n"
print "tallyThree: " + tallyThree.to_s + "\n"

if tallyOne >= tallyTwo && tallyOne >= tallyThree
    mode = 1
elsif tallyTwo >= tallyOne && tallyTwo >= tallyThree
    mode = 2
elsif tallyThree >= tallyOne && tallyThree >= tallyTwo
    mode = 3
else 
    print "errorTally!\n" 
end
print "mode = " + mode.to_s + "\n"
