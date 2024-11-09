import React, { useEffect, useState } from 'react';
import './Video.css';

const VideoList = () => {
    const [videos, setVideos] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);
    const [selectedVideo, setSelectedVideo] = useState(null);
    const [activeVideoId, setActiveVideoId] = useState(null);

    useEffect(() => {
        fetch('http://127.0.0.1:8000/api/video')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                setVideos(data.videos || []);
                setLoading(false);
                if (data.videos && data.videos.length > 0) {
                    fetchVideoWithNext(data.videos[0].id);
                }
            })
            .catch(error => {
                setError(error);
                setLoading(false);
            });
    }, []);

    const fetchVideoWithNext = (id) => {
        fetch(`http://127.0.0.1:8000/api/videos/${id}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                setSelectedVideo(data || null);
                setActiveVideoId(id);
            })
            .catch(error => {
                setError(error);
            });
    };

    const handleVideoClick = (video) => {
        fetchVideoWithNext(video.id);
    };

    const handleVideoEnd = () => {
        const currentIndex = videos.findIndex(video => video.id === activeVideoId);
        if (currentIndex !== -1 && currentIndex < videos.length - 1) {
            fetchVideoWithNext(videos[currentIndex + 1].id);
        }
    };

    if (loading) return <p>Loading...</p>;
    if (error) return <p>Error: {error.message}</p>;

    return (
        <div className="video-page">
            <header className="video-header">
                <h1 className='head'>Découvrir L'Anapec</h1>
            </header>
            <main className="video-main">
                <div className="video-player">
                    {selectedVideo ? (
                        <>
                            <video
                                key={selectedVideo.id}
                                className="video"
                                controls
                                onEnded={handleVideoEnd}
                            >
                                <source
                                    src={`http://127.0.0.1:8000/storage/${selectedVideo.video_path}`}
                                    type="video/mp4"
                                />
                            </video>
                            <h5 className="video-title">{selectedVideo.title}</h5>
                        </>
                    ) : (
                       <div></div>
                    )}
                </div>
                <div className="video-list">
                    <div className="video-items-container">
                        <h4>Video List</h4>
                        <ul>
                            {videos.map(video => (
                                <li
                                    key={video.id}
                                    className={`video-item ${activeVideoId === video.id ? 'active' : ''}`}
                                    onClick={() => handleVideoClick(video)}
                                >
                                    <video
                                        className="video-preview"
                                        width="100"
                                        controls
                                    >
                                        <source
                                            src={`http://127.0.0.1:8000/storage/${video.video_path}`}
                                            type="video/mp4"
                                        />
                                    </video>
                                    <p className="video-item-title">{video.title}</p>
                                </li>
                            ))}
                        </ul>
                    </div>
                </div>
            </main>
            <footer className="video-footer">
                <p>Anapec</p>
            </footer>
        </div>
    );
};

export default VideoList;