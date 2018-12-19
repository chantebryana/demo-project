require 'rubygems'
require 'json'
require 'date'

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

moonPhase.each_with_index do |value, index|
    if index > 0
        if index % 4 == 0
            dateRange = (Date.parse(value["date"]) - Date.parse(moonPhase[index-4]["date"])).to_i
            puts "#{value["date"]}: #{dateRange} days since last #{value["phase"]}"
            #puts value["date"]
        end 
    end
end
