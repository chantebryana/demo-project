require 'rubygems'
require 'json'
require 'date'

def methodTest (x, a)
    for i in 0...x.length-1
        a[i] = x[i+1] - x[i]
    end 
    return a
end

def phaseLength (x)
    for i in 1...x.length
        if i % 4 == 0
            puts (Date.parse(x[i]["date"]) - Date.parse(x[i-4]["date"])).to_i
        end
    end
end


array = []
#puts methodTest [11, 3, 6, 11], array


json = File.read('moonphase.json')
moonArray = JSON.parse(json)
moonPhase = moonArray["phasedata"]

#puts moonPhase[0]["date"]
#dateRange = (Date.parse(moonPhase[8]["date"]) - Date.parse(moonPhase[4]["date"])).to_i
#puts "#{dateRange} days"

#puts moonPhase[0]["phase"]
#puts moonPhase[4]["phase"]
#puts moonPhase[8]["phase"]

#puts moonPhase
dateRange = []
phaseLength moonPhase
=begin
moonPhase.each_with_index do |value, index|
    if index > 0
        if index % 4 == 0
            dateRange[index-1] = (Date.parse(value["date"]) - Date.parse(moonPhase[index-4]["date"])).to_i
            #puts "#{value["date"]}: #{dateRange} days since last #{value["phase"]}"
            #puts value["date"]
        end 
    end
    puts dateRange
end
=end

