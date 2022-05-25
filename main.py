import face_recognition
import cv2
import numpy as np
import mysql.connector
import datetime
import os
import glob
# def convertToBinaryData(filename):
#     # Convert digital data to binary format
#     with open(filename, 'rb') as file:
#         binaryData = file.read()
#     return binaryData

def push_to_db(image):
        mydb=mysql.connector.connect(
            host="localhost",
            user="root",
            password="",
            database="engage"
        )
        if mydb.is_connected() == True:
            mycursor = mydb.cursor()
            print("Inserting BLOB into python_employee table")            
            sql_insert_blob_query = f"INSERT INTO facerecog (name,budget_slab,contact_number,email,premium_products,average_product,image) VALUES ('-','-','-','-','-','-','{image}')";
            mycursor.execute(sql_insert_blob_query)
            mydb.commit()
        if mydb.is_connected():
            mydb.close()

def get_var_value(filename="varstore.dat"):
    with open(filename, "a+") as f:
        f.seek(0)
        val = int(f.read() or 0) + 1
        f.seek(0)
        f.truncate()
        f.write(str(val))
        return val




# Get a reference to webcam #0 (the default one)
video_capture = cv2.VideoCapture(0)

def rest_encoding():
    known_face_encodings = []
    known_face_names = []
    for image in glob.glob("images/*.jpg"):
      
        name = "Customer"+image.split(".")[0].split("\\")[1].split("_")[2]
        img_read = face_recognition.load_image_file(f"{image}")
        face_code = face_recognition.face_encodings(img_read)[0]
        known_face_encodings.append(face_code)
        known_face_names.append(name)
    return known_face_encodings,known_face_names


    
# Create arrays of known face encodings and their names
known_face_encodings = []
known_face_names = []
# Initialize some variables
face_locations = []
face_encodings = []
face_names = []
process_this_frame = True


startTime = None
known_face_encodings, known_face_names = rest_encoding()
while True:
    # Grab a single frame of video
    ret, frame = video_capture.read()

    # Resize frame of video to 1/4 size for faster face recognition processing
    small_frame = cv2.resize(frame, (0, 0), fx=0.25, fy=0.25)

    # Convert the image from BGR color (which OpenCV uses) to RGB color (which face_recognition uses)
    rgb_small_frame = small_frame[:, :, ::-1]

    # Only process every other frame of video to save time
    if process_this_frame:
        # Find all the faces and face encodings in the current frame of video
        face_locations = face_recognition.face_locations(rgb_small_frame)
        face_encodings = face_recognition.face_encodings(
            rgb_small_frame, face_locations)

        face_names = []
        for face_encoding in face_encodings:
            # See if the face is a match for the known face(s)
            matches = face_recognition.compare_faces(
                known_face_encodings, face_encoding, tolerance=0.5)
            name = "Unknown"

            # # If a match was found in known_face_encodings, just use the first one.
            # if True in matches:
            #     first_match_index = matches.index(True)
            #     name = known_face_names[first_match_index]

            # Or instead, use the known face with the smallest distance to the new face
            face_distances = face_recognition.face_distance(
                known_face_encodings, face_encoding)
            best_match_index = np.argmin(face_distances)
            if matches[best_match_index]:
                print(best_match_index)
                name = known_face_names[best_match_index]
            else:
                name = "unknown"
                if(name == "unknown"):
                    if startTime == None:
                        startTime = datetime.datetime.now()
                    if(int((datetime.datetime.now()-startTime).total_seconds()) > 6):
                        if(name == "unknown"):
                            _, frame = video_capture.read()
                            i=get_var_value()
                            new_image = f"images/saved_img_{str(i)}.jpg"
                            cv2.imwrite(filename=new_image, img=frame)   
                            push_to_db(new_image)
                            known_face_encodings, known_face_names = rest_encoding()
                            startTime = None
                            cv2.waitKey(1650)
                           

            face_names.append(name)

    process_this_frame = not process_this_frame

    # Display the results
    for (top, right, bottom, left), name in zip(face_locations, face_names):
        # Scale back up face locations since the frame we detected in was scaled to 1/4 size
        top *= 4
        right *= 4
        bottom *= 4
        left *= 4

        # Draw a box around the face
        cv2.rectangle(frame, (left, top), (right, bottom), (0, 0, 255), 2)

        # Draw a label with a name below the face
        cv2.rectangle(frame, (left, bottom - 40),
                      (right, bottom), (0, 0, 255), cv2.FILLED)
        font = cv2.FONT_HERSHEY_DUPLEX
        cv2.putText(frame, name, (left + 8, bottom - 8),
                    font, 1.0, (255, 255, 255), 1)

    # Display the resulting image
    cv2.imshow('Video', frame)

    # Hit 'q' on the keyboard to quit!
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

# Release handle to the webcam
video_capture.release()
cv2.destroyAllWindows()