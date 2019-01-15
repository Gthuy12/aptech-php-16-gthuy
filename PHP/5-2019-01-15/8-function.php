<?php
   function testinput($data)
   {
       $data= trim($data);
       $data= stripslashes($data);
       $data= htmlspecialchars($data);
       return $data;

   }// test input


   function validationform()
   {
       if ($_SERVER["REQUEST_METHOD"]=="POST")
       {

        $name=$email=$password ="";
        $nameerr=$emailerr=$passworderr="";


        if(testinput($_POST['inname']))
        {
            
            $name = validateInput($_POST["name"]);
            if (!preg_match("/^[a-zA-z ]*$/", $name)) 
             $nameErr = "Only letters and white space allowed";
                
            else $nameErr = "Name field is required";
                

        }

        if(testinput($_POST['inemail']))
        {
            $email=testinput($_POST['inemail']);
            if(!filter_var($email,filter_validate_email))
            $emailerr = "invalid email format";
            else
            $emailerr = "email field is required";
        }

        if(testinput($_POST['inpass']))
        {
            $password=testinput($_POST['inpass']);
            if(!filter_var($password,Filter_validate_password))
            $passworderr = " invalid password format";
            else
            $passworderr = " password field is required";

        }
    }

        $datainput = [
            1=> $name,
            2=> $email,
            3=> $password,
            4=> $nameerr,
            5=> $passworderr,
            6=> $emailerr
        ];
    }//validation form 

    function connectDatabase($serverName,$userName,$password)
          {
                $conn = mysqli_connect($serverName, $userName, $password, $database);
                if (!$conn) {
                die("Connection failed : " . $mysqli_connect_error());
                }
                return $conn;
          }// connect 


     
    function createdatabase($database)
    {
        $conn= connectDatabase("localhost","root","");

        $sql="CREATE DATABASE IF NOT EXISTS $database";
        if(mysql_query($conn,$sql))
        {
            echo "Database names ".$database. "created succesfull";
        }
        else
        {
            echo "Error creating database".mysql_error($conn);                                                        
        }
    }// create new database or not if exits one


    function createtable($sql)
    {
        $conn= connectDatabase("localhost","root","");

        if(mysql_query($conn,$sql))
        {
            echo "Create table sucessfull";
        }
        else
        {
            echo "Error creating table";
        }

        

    }// create table


    function insertdata($sql)
    {
        $conn= connectDatabase("localhost","root","");

        if()

    }




?>