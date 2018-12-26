require 'json'
require 'date'

#convert JSON file to array of hashes; return the array of hashes
def jsonToArray (jsonFile, arrayKey)
    json = File.read(jsonFile)
    moonArray = JSON.parse(json)
    return moonArray[arrayKey]
end

#compute lunar phase new moon to new moon; return an array of how many days are in each lunar phase (from new moon to the next new moon minus 1 day)
def phaseLength (x)
    a = []
    1.upto(x.length-1) do |i|
        if i % 4 == 0
            a.push (Date.parse(x[i]["date"]) - Date.parse(x[i-4]["date"]) - 1).to_i
        end
    end
    return a
end


moonPhase = jsonToArray 'moonphase.json', "phasedata"

moonDays = phaseLength moonPhase 
puts moonDays


#24 hours / 29 days = 0.8276 hours added to each day (while moon's set))

#puts 24.to_f / moonDays[0]

=begin
#b = []
0.upto(moonDays.length-1) do |i|
    puts (24.to_f / moonDays[i])
end
#puts b
=end

#6:00am plus 10 minutes; then 29 days
#puts Time.new(2019, 01, 06, 6, 0, 0, "-06:00") + 10*60
#puts Time.new(2019, 01, 06, 6, 0, 0, "-06:00") + 29*60*60*24

#CE compute the addition of time per day
#28 days == 0.857143 hours == 51.42858 minutes == 3085.7148 seconds
#2.2.1 :006 > Time.at(sec).utc.strftime("%H:%M:%S")
# => "00:51:25" 


#CE playing with parsing datetime for future array of hashes!!! 20181226 :-D
#puts moonPhase[0]["date"]
#d = DateTime.parse("2019 Jan 06 6:00 -06:00")
=begin
d = DateTime.parse(moonPhase[0]["date"] + " 6:00 -06:00")
puts d
d = d + 0.03571429166666666666666666666667
puts d
=end


#x = Time.new(2019, 01, 06, 6, 0, 0, "-06:00")
x = DateTime.parse(moonPhase[0]["date"] + " 6:00 -06:00")
#=begin
0.upto(28) do |i|
    puts x
    x = x + 0.03571429166666666666666666666667 + 1
end
#=end

=begin
[
  {
	  phaseLength1:[moonrise1, moonrise2, moonrise3,...,moonriseLast],
	  phaseLength2:[moonrise1, moonrise2, moonrise3,...,moonriseLast],
	  ...
	  phaseLengthLast:[moonrise1, moonrise2, moonrise3,...,moonriseLast]
  }
]

moonriseForThisDate(passDateTimeValue)
=end