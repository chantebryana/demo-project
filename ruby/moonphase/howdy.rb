require 'json'
require 'date'

def jsonToArray (jsonFile, arrayKey)
    json = File.read(jsonFile)
    moonArray = JSON.parse(json)
    return moonArray[arrayKey]
end

def phaseLength (x)
    a = []
    1.upto(x.length-1) do |i|
        if i % 4 == 0
            a.push (Date.parse(x[i]["date"]) - Date.parse(x[i-4]["date"])).to_i
        end
    end
    return a
end

moonPhase = jsonToArray 'moonphase.json', "phasedata"

moonDays = phaseLength moonPhase 
puts moonDays[1]

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

x = Time.new(2019, 01, 06, 6, 0, 0, "-06:00")
#x = x + 49.655172*60
puts x
#=begin
1.upto(29) do |i|
    x = x + 49.655172*60 + 1*60*60*24
    puts x
end
#=end