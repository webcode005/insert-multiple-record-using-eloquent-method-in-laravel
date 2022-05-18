<?php
public function add_quizz (Request $request)
    {
                   $User_Id = Session::get('UserId');

        
                $title = $request->input('qtitle');
                $options = $request->input('options');
                $answer = $request->input('answer'); 
                $marks = $request->input('marks'); 
                $topic_id = $request->input('topic_id'); 
                

                    foreach($request->input('answer') as $key => $value) 
                    {
            
                        $save = new Quizz;
                    
                        $save->title = $title[$key];                   
                        $save->options = $options[$key];
                        $save->answer  = $answer[$key];
                        $save->marks   = $marks[$key];
                        $save->course_topic_id   = $topic_id;
                        
                        $save->uploaded_by = $User_Id;
                   
                   $save->save();

                    }
            
                   return redirect('/course-content')->with('success', 'Quizz Of Course Has been uploaded');
      
      }
        ?>
