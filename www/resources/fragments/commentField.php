
<div class="comment">
	<h2>Please leave a comment!</h2>
    <p>(You need to be logged in to leave a comment.)</p>

           
    <div id="newComment">

    	<div class="textarea">
    	   <textarea id= "entry" data-bind="textInput: comment" name="comment" rows = 5 placeholder="Write your comment here."></textarea>
    	</div>
        
        <p>
    	   <button data-bind="click: sendEntry">Send</button>
        </p>
        
        <p><br></p>

    </div>

    <div id="commentField"> 
        <p>
            <button data-bind="click: getNewEntries">Load new comments</button>
        </p>
    
        <h2>Comments:</h2>
        
        <!-- ko foreach: {data: entries, as: 'entry'} -->
        
            <h5 data-bind="text: entry.author"></h5>
            <p data-bind="text: entry.comment"></p><br>
        
            <!-- ko if: entry.loggedIn -->
                                
                <p class='delete'>
                    <button data-bind="click: $parent.deleteEntry">Delete</button>
                </p>
            <!-- /ko -->
       
         <!-- /ko -->
      
    </div>
</div>
    
 

