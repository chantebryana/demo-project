require 'rubygems'
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

puts phaseLength moonPhase 

