$(document).ready(function() {

    var baseUrl = "http://localhost/TastyRecipes/View/";
        
    var userNameUrl = baseUrl + "GetUsername";
    var readUrl = baseUrl + "GetComments";
    var deleteUrl = baseUrl + "DeletComment";
    var writeUrl = baseUrl + "AddComment";
    
    function EntryToAdd() {
  
        var self = this;
        self.username = ko.observable(); 
        self.comment = ko.observable("");

        $.getJSON(userNameUrl, function(result){
            self.username(result);
 
        });
        
        self.sendEntry = function () {
            
            if (self.comment() !== "") {
                
                if(self.username()) {
                    $.post(writeUrl, "comment=" + ko.toJS(self.comment));
                }
                
                else{
                    window.alert("Sorry, you are not logged in! Log in at the top right corner and try again");
                }
                
                self.comment("");
            }
        };
       
    }
    
    function Comment(entryToAdd) {
        
        var self = this;
        self.entryToAdd = entryToAdd;
        self.lastSeenTimestamp = "0000-00-00 00:00:00";
        self.entries = ko.observableArray();
        self.author = ko.observable();
            
        self.getNewEntries = function () { 
            
            $.getJSON(readUrl, function (result) {
                  
                for (var i = 0; i <result.length; i++) {
                
                    self.name = result[i++];
                    self.com = result[i++];
                    self.time = result[i];
                    self.iWroteThisEntry = (self.name === self.entryToAdd.username());
                       
                    var entry = {author: self.name, comment: self.com, timestamp: self.time, loggedIn: self.iWroteThisEntry};
                    
                    entry.comment = removeQuotes(entry.comment).split("\\n");
                    entry.author = removeQuotes(entry.author);
                            
                    if(entry.timestamp > self.lastSeenTimestamp) {
                    
                        self.entries.unshift(entry);
                        self.lastSeenTimestamp = entry.timestamp;
                    }
                             
                }
            });
        }

        self.deleteEntry = function (entry) {
            
            self.entries.remove(entry);
            $.post(deleteUrl, "timestamp=" + ko.toJS(entry.timestamp));
        };
       
        self.getNewEntries(); 
    }
   

    /**
     * Removes double quotes from the specified string.
     * 
     * @param {String} str The string from which to remove quotes.
     * @returns {String} 'str', without double quotes.
     */
    function removeQuotes(str) {
        return str.replace(/\"/g, "");
    }
            
    var entryToAdd = new EntryToAdd();
    ko.applyBindings(entryToAdd, document.getElementById('newComment'));
    ko.applyBindings(new Comment(entryToAdd), document.getElementById('commentField'));

});