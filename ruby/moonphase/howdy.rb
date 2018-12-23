require 'rubygems'
require 'json'
require 'date'
=begin
def jsonToArray (array) 
    json = File.read('moonphase.json')
    moonArray = JSON.parse(json)
    array = moonArray["phasedata"]
    return array 
end
=end
def phaseLength (x)
    a = []
    1.upto(x.length-1) do |i|
        if i % 4 == 0
            a.push (Date.parse(x[i]["date"]) - Date.parse(x[i-4]["date"])).to_i
        end
    end
    return a
end


#moonPhase = []
#jsonToArray moonPhase
json = File.read('moonphase.json')
moonArray = JSON.parse(json)
moonPhase = moonArray["phasedata"]

#puts moonPhase[0]["date"]
#dateRange = (Date.parse(moonPhase[8]["date"]) - Date.parse(moonPhase[4]["date"])).to_i
#puts "#{dateRange} days"

#puts moonPhase[0]["phase"]

#puts moonPhase
puts phaseLength moonPhase 

